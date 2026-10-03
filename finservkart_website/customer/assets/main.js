(function ($) {
 'use strict';

 $('#tm_download_btn').on('click', function () {
    var downloadSection = $('#tm_download_section');
    var cWidth = downloadSection.width();
    var cHeight = downloadSection.height();
    var topLeftMargin = 0;
    var pdfWidth = cWidth + topLeftMargin * 2;
    var pdfHeight = pdfWidth * 1.5 + topLeftMargin * 2;
    var canvasImageWidth = cWidth;
    var canvasImageHeight = cHeight;
    var totalPDFPages = Math.ceil(cHeight / pdfHeight) - 1;

    // Increase the DPI and scale for better quality
    var dpi = 300; // Higher DPI for better quality
    var scale = 2; // Increase scale for better resolution

    html2canvas(downloadSection[0], {
      allowTaint: true,
      dpi: dpi, // Set the DPI
      scale: scale, // Set the scale
    }).then(function (canvas) {
      canvas.getContext('2d');
      var imgData = canvas.toDataURL('image/png', 1.0);
      var pdf = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);
      pdf.addImage(
        imgData,
        'PNG',
        topLeftMargin,
        topLeftMargin,
        canvasImageWidth,
        canvasImageHeight
      );
      for (var i = 1; i <= totalPDFPages; i++) {
        pdf.addPage(pdfWidth, pdfHeight);
        pdf.addImage(
          imgData,
          'PNG',
          topLeftMargin,
          -(pdfHeight * i) + topLeftMargin * 0,
          canvasImageWidth,
          canvasImageHeight
        );
      }
      pdf.save('invoice.pdf');
    });
 });

})(jQuery);
