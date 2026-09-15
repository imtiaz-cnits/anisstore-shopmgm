@extends('layouts.dashboard-sidenav')
@section('title', 'BarCode Print Page')
@section('content')

<style>
  /* ========================================================
     BARCODE GENERATE DESIGN SYSTEM (Matching POS / Purchase)
     Brand: Royal Purple (#8C56D4) with Dark Mode Support
     ======================================================== */
  .barcode-print-wrapper {
    background: #ffffff;
    border: 1px solid #E5D5F7;
    border-radius: 18px;
    padding: 24px;
    box-shadow: 0 10px 30px rgba(140, 86, 212, 0.06);
    max-width: 800px;
    margin: 0px auto;
    transition: all 0.2s ease;
  }

  .barcode-print-wrapper .title {
    font-size: 24px;
    font-weight: 800;
    color: #1e293b;
    text-align: center;
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    justify-content: start;
    gap: 10px;
  }

  .barcode-print-wrapper .src-group {
    background-color: #FAF7FD;
    border: 1.5px solid #E5D5F7;
    border-radius: 14px;
    padding: 12px 18px;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 16px;
    transition: all 0.2s ease;
  }
  .barcode-print-wrapper .src-group:focus-within {
    border-color: #8C56D4;
    box-shadow: 0 0 0 3px rgba(140, 86, 212, 0.12);
  }

  .barcode-print-wrapper .src-group label {
    font-size: 15px;
    font-weight: 700;
    color: #1e293b;
    min-width: 140px;
    margin: 0;
  }

  .barcode-print-wrapper .src-group input {
    flex: 1;
    width: 100%;
    height: 44px;
    border-radius: 10px;
    border: 1.5px solid #cbd5e1;
    background: #ffffff;
    color: #1e293b;
    font-size: 15px;
    font-weight: 600;
    padding: 10px 14px;
    outline: none;
    transition: all 0.2s ease;
  }
  .barcode-print-wrapper .src-group input:focus {
    border-color: #8C56D4;
    box-shadow: 0 0 0 2px rgba(140, 86, 212, 0.15);
  }

  .barcode-print-wrapper .form-group {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
  }

  .barcode-print-wrapper .btn-generate {
    background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
    color: #ffffff !important;
    border: none !important;
    border-radius: 10px !important;
    padding: 10px 24px !important;
    font-size: 14.5px !important;
    font-weight: 700 !important;
    cursor: pointer !important;
    transition: all 0.2s ease !important;
    min-width: 120px;
    box-shadow: 0 4px 14px rgba(140, 86, 212, 0.25);
  }
  .barcode-print-wrapper .btn-generate:hover {
    background: linear-gradient(135deg, #793FC5 0%, #672EB0 100%) !important;
    transform: translateY(-1px);
  }

  .barcode-print-wrapper .btn-reset {
    background: #ef4444 !important;
    color: #ffffff !important;
    border: none !important;
    border-radius: 10px !important;
    padding: 10px 24px !important;
    font-size: 14.5px !important;
    font-weight: 700 !important;
    cursor: pointer !important;
    transition: all 0.2s ease !important;
    min-width: 120px;
  }
  .barcode-print-wrapper .btn-reset:hover {
    background: #dc2626 !important;
    transform: translateY(-1px);
  }

  .barcode-print-wrapper .btn-print {
    background: linear-gradient(135deg, #8C56D4 0%, #793FC5 100%) !important;
    color: #ffffff !important;
    border: none !important;
    border-radius: 10px !important;
    padding: 10px 26px !important;
    font-size: 14px !important;
    font-weight: 700 !important;
    margin: 16px auto !important;
    display: block !important;
    box-shadow: 0 4px 14px rgba(140, 86, 212, 0.25);
    cursor: pointer !important;
  }

  .barcode-print-wrapper .grid-container {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    justify-content: center;
    margin-top: 16px;
  }
  .barcode-print-wrapper .grid-item {
    background: #ffffff;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    padding: 8px;
  }

  /* Mobile Responsive: Label on top, Input underneath */
  @media screen and (max-width: 767.98px) {
    .barcode-print-wrapper {
      padding: 16px !important;
      margin: 0px 0px !important;
      border-radius: 14px !important;
      width: 100% !important;
      box-sizing: border-box !important;
    }
    .barcode-print-wrapper .title {
      font-size: 20px !important;
      margin-bottom: 18px !important;
    }
    .barcode-print-wrapper .src-group {
      flex-direction: column !important;
      align-items: flex-start !important;
      gap: 6px !important;
      padding: 12px 14px !important;
      border-radius: 12px !important;
      width: 100% !important;
      box-sizing: border-box !important;
    }
    .barcode-print-wrapper .src-group label {
      width: 100% !important;
      min-width: auto !important;
      font-size: 13.5px !important;
      margin-bottom: 2px !important;
    }
    .barcode-print-wrapper .src-group input {
      width: 100% !important;
      height: 44px !important;
      padding: 10px 14px;
      font-size: 14px !important;
      box-sizing: border-box !important;
    }
    .barcode-print-wrapper .form-group {
      width: 100% !important;
    }
    .barcode-print-wrapper .btn-generate,
    .barcode-print-wrapper .btn-reset {
      flex: 1 1 50% !important;
      width: 50% !important;
      height: 44px !important;
      padding: 0 !important;
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
    }
  }

  /* Universal Dark Mode Overrides */
  body[light-mode="dark"] .barcode-print-wrapper,
  body[data-layout-mode="dark"] .barcode-print-wrapper,
  body.dark-mode .barcode-print-wrapper,
  html[light-mode="dark"] .barcode-print-wrapper {
    background: #1e293b !important;
    border-color: #334155 !important;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5) !important;
  }

  body[light-mode="dark"] .barcode-print-wrapper .title,
  body[data-layout-mode="dark"] .barcode-print-wrapper .title,
  body.dark-mode .barcode-print-wrapper .title,
  html[light-mode="dark"] .barcode-print-wrapper .title {
    color: #f8fafc !important;
  }

  body[light-mode="dark"] .barcode-print-wrapper .src-group,
  body[data-layout-mode="dark"] .barcode-print-wrapper .src-group,
  body.dark-mode .barcode-print-wrapper .src-group,
  html[light-mode="dark"] .barcode-print-wrapper .src-group {
    background-color: #0f172a !important;
    border-color: #334155 !important;
  }

  body[light-mode="dark"] .barcode-print-wrapper .src-group label,
  body[data-layout-mode="dark"] .barcode-print-wrapper .src-group label,
  body.dark-mode .barcode-print-wrapper .src-group label,
  html[light-mode="dark"] .barcode-print-wrapper .src-group label {
    color: #cbd5e1 !important;
  }

  body[light-mode="dark"] .barcode-print-wrapper .src-group input,
  body[data-layout-mode="dark"] .barcode-print-wrapper .src-group input,
  body.dark-mode .barcode-print-wrapper .src-group input,
  html[light-mode="dark"] .barcode-print-wrapper .src-group input {
    background: #1e293b !important;
    border-color: #334155 !important;
    color: #f8fafc !important;
  }
</style>

<div class="main-content">
    <div class="page-content">
      <!-- Barcode Start -->
      <div class="barcode-print-wrapper">
        <header class="header">
          <h2 class="title">
            <i class="fa-solid fa-barcode" style="color: #8C56D4;"></i>
            <span>Barcode Generate</span>
          </h2>
        </header>
        <section class="main-form">
          <div class="src-group">
            <label for="StartBarCode">Start BarCode:</label>
            <input type="text" id="StartBarCode" placeholder="Start BarCode (যেমন: 1 বা K-1)" autocomplete="off" />
          </div>
          <div class="src-group">
            <label for="EndBarCode">End BarCode:</label>
            <input type="text" id="EndBarCode" placeholder="End BarCode (যেমন: 50 বা K-50)" autocomplete="off" />
          </div>

          <div class="form-group mt-3">
            <button class="btn-generate" id="generateBtn">
              <i class="fa-solid fa-bolt me-1"></i> Generate
            </button>
            <button class="btn-reset" onclick="resetBarcodes()">
              <i class="fa-solid fa-rotate-left me-1"></i> Reset
            </button>
          </div>
        </section>
        <section class="barcode-preview">
          <div class="barcode-print-wrapper-inner">
            <button onclick="printBarCard()" class="btn-print" id="printBtn" style="display: none;">
              <i class="fa-solid fa-print me-1"></i> Print A4
            </button>
            <div class="grid-container" id="barcodeGrid">
              <!-- Dynamic barcode items will be appended here -->
            </div>
          </div>
        </section>
      </div>
      <!-- Barcode End -->
      <div class="copyright">
        <footer class="footer text-center py-3 mt-4 text-muted small border-top">&copy; 2026 মেসার্স আনিস ষ্টোর | Software By: <a href="https://www.codenextit.com" target="_blank" class="text-success fw-bold text-decoration-none">CodeNext IT</a></footer>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>


<script>
    document.getElementById('generateBtn').addEventListener('click', function() {
  // Get the start and end barcode values
  const startBarcode = document.getElementById('StartBarCode').value.trim();
  const endBarcode = document.getElementById('EndBarCode').value.trim();

  if (!startBarcode || !endBarcode) {
    alert('Please enter both start and end barcode values.');
    return;
  }

  // Initialize the prefix and number for the start barcode
  let startPrefix = '';
  let startNumber = 0;

  // If a prefix is provided (e.g., K-1), split it by '-'
  if (startBarcode.includes('-')) {
    const startParts = startBarcode.split('-');
    startPrefix = startParts[0]; // Get the prefix (e.g., 'K')
    startNumber = parseInt(startParts[1]); // Get the numeric part (e.g., '1')
  } else {
    // If no prefix, assume 'G' and the provided number is the start
    startPrefix = ''; // Default to no prefix if the user just enters a number
    startNumber = parseInt(startBarcode);
  }

  // Do the same for the end barcode
  let endPrefix = '';
  let endNumber = 0;

  if (endBarcode.includes('-')) {
    const endParts = endBarcode.split('-');
    endPrefix = endParts[0]; // Get the prefix (e.g., 'K')
    endNumber = parseInt(endParts[1]); // Get the numeric part (e.g., '100')
  } else {
    // If no prefix, assume 'G' and the provided number is the end
    endPrefix = ''; // Default to no prefix if the user just enters a number
    endNumber = parseInt(endBarcode);
  }

  // Validate the numeric part
  if (isNaN(startNumber) || isNaN(endNumber)) {
    alert('Invalid barcode number. Please enter a valid number.');
    return;
  }

  // If the prefixes are different, show an alert
  if (startPrefix !== endPrefix && startPrefix !== '' && endPrefix !== '') {
    alert('The barcode prefix should be the same for both start and end.');
    return;
  }

  // If start number is greater than end number, show an alert
  if (startNumber > endNumber) {
    alert('Start barcode must be less than or equal to the end barcode.');
    return;
  }

  const barcodeGrid = document.getElementById('barcodeGrid');
  barcodeGrid.innerHTML = ''; // Clear previous barcodes

  // Generate barcodes in a loop
  for (let i = startNumber; i <= endNumber; i++) {
    const barcode = `${startPrefix ? startPrefix + '-' : ''}${i}`; // Keep the format like K-1, A-2, etc.
    const barcodeCard = `
      <div class="grid-item">
        <div class="barcode-card-item">
          <!-- Display the dynamically generated barcode image -->
          <div class="barcode-image">
            <svg id="barcode-${barcode}"></svg> <!-- Placeholder for barcode image -->
          </div>
          <!-- Display the barcode number -->
          <div class="details">
          </div>
        </div>
      </div>
    `;
    barcodeGrid.innerHTML += barcodeCard;

    // Generate the barcode using JsBarcode and append it to the SVG element
    JsBarcode(`#barcode-${barcode}`, barcode, {
      format: "CODE128", // Set barcode format (CODE128 is commonly used)
      displayValue: true, // Show the barcode value under the barcode
      width: 2, // Width of barcode bars
      height: 40, // Height of the barcode
      margin: 10 // Margin around the barcode
    });
  }

  const printBtn = document.getElementById('printBtn');
  if (printBtn) printBtn.style.display = 'block';
});

// Reset the barcode generation
function resetBarcodes() {
  document.getElementById('StartBarCode').value = '';
  document.getElementById('EndBarCode').value = '';
  document.getElementById('barcodeGrid').innerHTML = ''; // Clear generated barcodes
  const printBtn = document.getElementById('printBtn');
  if (printBtn) printBtn.style.display = 'none';
}

function printBarCard() {
  window.print(); // Trigger the print functionality for the page
}

</script>


@endsection
