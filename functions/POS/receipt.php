<?php
//  TCPDF library
require_once('../tcpdf/tcpdf.php');
require_once('../tcpdf/include/tcpdf_font_data.php');


require_once('../index/connection2data.php');

// order id passed through get request
$orderId = isset($_GET['orderId']) ? intval($_GET['orderId']) : 0;

if ($orderId > 0) {
    // fetching the order details
    $stmt = $connection->prepare("SELECT items, total, order_date FROM orders WHERE order_id = ?");
$stmt->execute([$orderId]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

   if ($order) {
    //  then innitializing "TCPDF" plugin objects
    $pdf = new TCPDF();

    // this is the documentation details.
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Mill House ©');
    $pdf->SetTitle('Receipt for Order #' . $orderId);
    $pdf->SetSubject('Order Receipt');

    
    $pdf->AddPage();


    // getting the order date data
    $orderDate = new DateTime($order['order_date']);
    $formattedOrderDate = $orderDate->format('Y-m-d H:i:s'); // changes the format

    // pdf content 
    $html = <<<EOD
    <h1 style="text-align: center;" >Mill House Order Reciept #{$orderId}</h1>
    <p style="text-align: center;" >Order Date: {$formattedOrderDate}</p>
    <p style="text-align: center;"> Thank you for shopping with us at the Mill House © </p> 
    <h2 >Items:</h2>
    <ul>

EOD;

    foreach (explode(', ', $order['items']) as $item) {
        $html .= "<li>{$item}</li>";
    }
    
    $html .= "</ul>";
    $html .= "<p>Total: £" . number_format($order['total'], 2) . "</p>";



    // writeHTML will print text
    $pdf->writeHTML($html, true, false, true, false, '');

    // outputs in inline view.
    $pdf->Output('receipt_' . $orderId . '.pdf', 'I'); // 'I' for inline view
} else {
    echo "Order not found.";
}
}