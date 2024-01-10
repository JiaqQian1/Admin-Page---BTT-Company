function printReport(orderId) {
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Sales Report - Order ' + orderId + '</title></head><body>');
    printWindow.document.write('<h1>Sales Report - Order ' + orderId + '</h1>');
    printWindow.document.write(document.querySelector('.order-list table').outerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}

function printAllReports() {
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>All Sales Reports</title></head><body>');
    printWindow.document.write('<h1>All Sales Reports</h1>');
    printWindow.document.write(document.querySelector('.order-list table').outerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}