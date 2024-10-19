import {
    Html5QrcodeScanner,
    Html5QrcodeScanType,
    Html5QrcodeSupportedFormats,
} from 'html5-qrcode';

function onScanSuccess(decodedText) {
    const result = document.getElementById('decoded-text');

    if (result != null) {
        result.value = decodedText;
    } else {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.id = 'decoded-text';
        input.name = 'decoded-text';
        input.value = decodedText;
        input.autocomplete = false;
        input.autocapitalize = false;

        const reader = document.getElementById('reader');
        reader.insertAdjacentElement('afterend', input);
    }
}

function onScanFailure(error) {
    console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
    'reader',
    {
        rememberLastUsedCamera: true,
        supportedScanTypes: [
            Html5QrcodeScanType.SCAN_TYPE_CAMERA,
            Html5QrcodeScanType.SCAN_TYPE_FILE,
        ],
        showTorchButtonIfSupported: true,
        showZoomSliderIfSupported: true,
        fps: 10,
        qrbox: {
            width: 250,
            height: 250,
        },
        videoConstraints: {
            facingMode: { exact: 'environment' },
        },
        formatsToSupport: [Html5QrcodeSupportedFormats.QR_CODE],
        useBarCodeDetectorIfSupported: false,
    },
    false,
);

html5QrcodeScanner.render(onScanSuccess, onScanFailure);
