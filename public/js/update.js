function updateOrderButton() {
    const quantity = document.getElementById('quantity').value;
    const orderButton = document.querySelector('.detail-bibit .content .btn.btn-success');
    orderButton.disabled = quantity === '0'; // Disable button if quantity is 0

    orderButton.addEventListener('click', function (event) {
        event.preventDefault();

        // Menyiapkan data untuk dikirim
        const buyer_name = prompt('Masukkan Nama Pembeli:');
        const buyer_address = prompt('Masukkan Alamat Pembeli:');
        const buyer_phone = prompt('Masukkan Nomor Telephone Pembeli:');

        const formData = new FormData();
        formData.append('quantity', quantity);
        formData.append('buyer_name', buyer_name);
        formData.append('buyer_address', buyer_address);
        formData.append('buyer_phone', buyer_phone);

        // Mengirim request POST
        fetch("{{ route('pesan', $benihData) }}", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Redirect to detailpesan.blade.php or handle response accordingly
        })
        .catch(error => console.error('Error:', error));
    });
}
