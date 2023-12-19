$('.button-export-chart').click(function (e) { 
  e.preventDefault();
  var export_type=$(this).data('export-type');
  var export_to=$(this).data('export-to');
  var export_target=$(this).data('export-target');

  const canvas = document.getElementById(export_target); // Gantilah dengan ID elemen canvas Anda
  if (export_type=='chart') {
      if (export_to=='pdf') {
        // Mengekspor sebagai PDF
        const aspectRatio = canvas.width / canvas.height;
    
        const pdfWidth = canvas.width; // Adjust as needed
        const pdfHeight = pdfWidth / aspectRatio;
    
        const imageUrl = canvas.toDataURL('image/png');
        const img = new Image();
        img.src = imageUrl;
    
        img.onload = () => {
            const tempCanvas = document.createElement('canvas');
            
            // Increase pixel density for higher quality
            const dpi = 300;
            tempCanvas.width = pdfWidth * dpi / 72;
            tempCanvas.height = pdfHeight * dpi / 72;
            
            const tempCtx = tempCanvas.getContext('2d');
            tempCtx.fillStyle = '#ffffff'; // White background
            tempCtx.fillRect(0, 0, tempCanvas.width, tempCanvas.height);
            tempCtx.drawImage(img, 0, 0, tempCanvas.width, tempCanvas.height);
    
            const finalImageUrl = tempCanvas.toDataURL('image/jpeg', 1.0);
    
            // Convert the image to PDF
            const pdf = new jsPDF({
                unit: 'pt',
                format: 'a4',
            });
            pdf.addImage(finalImageUrl, 'JPEG', 0, 0, pdfWidth, pdfHeight); // Adjust position and size
            pdf.save('chart.pdf');
        };
      }else if (export_to=='png') {
        // Mengekspor sebagai gambar PNG
        const imageUrl = canvas.toDataURL('image/png');
        const tempImg = new Image();
        tempImg.src = imageUrl;
        tempImg.onload = () => {
            const tempCanvas = document.createElement('canvas');
            const tempCtx = tempCanvas.getContext('2d');
            
            tempCanvas.width = tempImg.width;
            tempCanvas.height = tempImg.height;
            
            tempCtx.fillStyle = '#ffffff'; // Putih
            tempCtx.fillRect(0, 0, tempCanvas.width, tempCanvas.height);
            
            tempCtx.drawImage(tempImg, 0, 0);
            
            const finalImageUrl = tempCanvas.toDataURL('image/png');
            
            const link = document.createElement('a');
            link.href = finalImageUrl;
            link.download = 'chart.png';
            link.click();
        };
      }
  }else{
    const tableDiv = document.getElementById(export_target);

    
        if (export_to=='pdf') {
            html2canvas(tableDiv, { scale: 2 }).then(canvas => {
                const imgData = canvas.toDataURL('image/jpeg'); // Change format to 'image/png' if needed
        
                const pdf = new jsPDF({
                    unit: 'pt',
                    format: 'a4'
                });

                const pdfWidth = tableDiv.offsetWidth; // Get the width of the table
                const pdfHeight = tableDiv.offsetHeight;
        
                pdf.addImage(imgData, 'JPEG', 0, 0, pdfWidth, pdfHeight);
                pdf.save('table.pdf');
            });
        }else if (export_to=='png') {

            html2canvas(tableDiv).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
        
                const a = document.createElement('a');
                a.href = imgData;
                a.download = 'table.png';
                a.style.display = 'none';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            });
        } else {
            return false;
        }
    
  }
    
});