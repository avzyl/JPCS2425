<?php
require_once "../../vendor/autoload.php";

use Dompdf\Dompdf;

// Create a new instance of Dompdf
$dompdf = new Dompdf();

// Get POST data
$date = $_POST["date"];
$receipt_no = $_POST["receipt_no"];
$name = $_POST["name"];
$student_no = $_POST["student_no"];
$items = $_POST["item"];
$prices = $_POST["price"];
$quantities = $_POST["quantity"];
$Gtotal = $_POST["Gtotal"];
$notes = $_POST["notes"];

// Generate HTML content
$html = "
<html>
<head>
    <style>
        body { 
            font-family: Arial, sans-serif; 
        }
        .w-full { 
            width: 100%; 
        }
        .border-collapse { 
            border-collapse: collapse; 
        }
        .border-spacing-0 { 
            border-spacing: 0; 
        }
        .border-b { 
            border-bottom: 1px solid #ddd; 
        }
        .text-right { 
            text-align: right; 
        }
        .text-center { 
            text-align: center; 
        }
        .font-bold { 
            font-weight: bold; 
        }
        .text-main { 
            color: #3a200a; 
        }
        .bg-slate-100 { 
            background-color: #f9f483; 
        }
        .text-neutral-600 { 
            color: #666; 
        }
        .text-neutral-700 { 
            color: #333; 
        }
        .text-slate-400 { 
            color: #888;
        }
        .text-slate-300 { 
            color: #aaa; 
        }
        .bg-main { 
            background-color: #000; 
            color: #fff; 
        } /* Change to your color */
        .italic { 
            font-style: italic;
            padding: 0.5rem; 
        }
        .py-4 { 
            padding-top: 1rem; 
            padding-bottom: 1rem; 
        }
        .py-6 { 
            padding-top: 1.5rem; 
            padding-bottom: 1.5rem; 
        }
        .py-10 { 
            padding-top: 2.5rem; 
            padding-bottom: 2.5rem; 
        }
        .px-14 { 
            padding-left: 3.5rem; 
            padding-right: 3.5rem; 
        }
        .pr-4 {
            padding-right: 2rem; 
            text-align: right; 
        }
        .text-nowrap {
            white-space: nowrap;
        }
        .invoice-details {
            margin-right: 3rem;
            width: 250px;
        }   
        .border-r {
            border-right: 1px solid #ddd;
        }
        .text-right {
          padding-right: 0.5rem;
        }
        .text-total {
          width: 50px !important;
        }
    </style>
</head>
<body>
  <div>
    <div class='py-4'>
      <div class='px-14 py-6'>
        <table class='w-full border-collapse border-spacing-0'>
          <tbody>
            <tr>
              <td class='w-full align-top'>
                <div>
                    <h1 class='text-main'>JPCS</h1>
                    <h3 class='text-main'>Receipt</h3>
                </div>
              </td>
              <td class='align-top'>
                <div class='text-sm'>
                  <table class='border-collapse border-spacing-0 invoice-details'>
                    <tbody>
                      <tr>
                        <td class='border-r pr-4'>
                          <div>
                            <p class='text-slate-400 text-right text-nowrap'>Date:</p>
                            <p class='font-bold text-main text-right'>$date</p>
                          </div>
                        </td>
                        <td class='pl-4'>
                          <div>
                            <p class='text-slate-400 text-right text-nowrap'>Receipt #:</p>
                            <p class='font-bold text-right text-main'>$receipt_no</p>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class='bg-slate-100 px-14 py-6 text-sm'>
        <table class='w-full border-collapse border-spacing-0'>
          <tbody>
            <tr>
              <td class='w-1/2 align-top'>
                <div class='text-sm text-neutral-600'>
                  <p class='font-bold'>Junior Philippine Computer Society</p>
                  <p>Email: jpcs_mls@mls.ceu.edu.ph</p>
                  <p>Centro Escolar University - Malolos</p>
                </div>
              </td>
              <td class='w-1/2 align-top text-right'>
                <div class='text-sm text-neutral-600'>
                  <p class='font-bold'>$name</p>
                  <p>Student Number: $student_no</p>
                  <p>Program and Section: BSIT3A</p>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class='px-14 py-10 text-sm text-neutral-700'>
        <table class='w-full border-collapse border-spacing-0'>
          <thead>
            <tr>
              <td class='border-b-2 border-main pb-3 pl-3 font-bold text-main'>#</td>
              <td class='border-b-2 border-main pb-3 pl-2 font-bold text-main'>Item</td>
              <td class='border-b-2 border-main pb-3 pl-2 text-center font-bold text-main'>Quantity</td>
              <td class='border-b-2 border-main pb-3 pl-2 text-right font-bold text-main'>Price</td>
            </tr>
          </thead>
          <tbody>";

            // Iterate through items and add rows
            for ($i = 0; $i < count($items); $i++) {
                $item = htmlspecialchars($items[$i]);
                $price = htmlspecialchars($prices[$i]);
                $quantity = htmlspecialchars($quantities[$i]);
                $Gtotal = htmlspecialchars($Gtotal);
                $html .= "
                <tr>
                  <td class='border-b py-3 pl-3'>" . ($i + 1) . ".</td>
                  <td class='border-b py-3 pl-2'>$item</td>
                  <td class='border-b py-3 pl-2 text-center'>$quantity</td>
                  <td class='border-b py-3 pl-2 text-right'>$price</td>
                </tr>";
            }

            $html .= "
            <tr>
              <td colspan='7'>
                <table class='w-full border-collapse border-spacing-0'>
                  <tbody>
                    <tr>
                      <td class='w-full'></td>
                      <td>
                        <table class='w-full border-collapse border-spacing-0'>
                          <tbody>
                            <tr>
                              <td class='bg-slate-100 p-3'>
                                <div class='whitespace-nowrap font-bold text-white'>Total:</div>
                              </td>
                              <td class='bg-slate-100 p-3 text-total'>
                                <div class='whitespace-nowrap font-bold text-white'>$Gtotal</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class='px-14 text-sm text-neutral-700'>
        <p class='text-main font-bold'>PAYMENT DETAILS</p>
        <p>GCash</p>
        <p>GCash Number: 09620621832</p>
        <p>Account Name: SE*N CAR**O D.</p>
        <p>Position: JPCS Treasurer</p>
      </div>

      <div class='px-14 py-10 text-sm text-neutral-700'>
        <p class='text-main font-bold'>Notes</p>
        <p class='italic bg-slate-100'>$notes</p>
      </div>

      <footer class='fixed bottom-0 left-0 bg-slate-100 w-full text-neutral-600 text-center text-xs py-3'>
        Junior Philippine Computer Society
        <span class='text-slate-300 px-2'>|</span>
        jpcs_mls@mls.ceu.edu.ph
        <span class='text-slate-300 px-2'>|</span>
        Facebook.com/JPCSMLLS
      </footer>
    </div>
  </div>
</body>
</html>
";

// Load HTML content
$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'Portrait');

// Render PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Receipt.pdf", ["Attachment" => 0]);
?>
