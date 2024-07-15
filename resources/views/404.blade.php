<!-- resources/views/errors/404_default.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
<script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen bg-cover bg-center" style="background-image: url('/path/to/your/background-image.jpg');">
        <div class="bg-white p-8 rounded shadow-lg text-center max-w-md mx-auto">
            <img src="{{ URL::asset('dist/assets/img/kelimatu_logo.png') }}" alt="Logo" class="w-24 mx-auto mb-4">
            <h1 class="text-5xl font-bold text-[#671282] mb-4">404</h1>
            <p class="text-lg text-gray-700 mb-6">MOHON MAAF - HALAMAN TIDAK DITEMUKAN</p>
            <p class="text-gray-600 mb-6">Halaman yang Anda cari telah dipindahkan, dihapus, diubah, atau tidak pernah ada. Silakan menghubungi kami untuk informasi lebih lanjut.</p>
            <div class="flex justify-center space-x-4 mb-4">
                <a href="{{ url()->previous() }}" class="text-blue-600">Kembali</a>
                <a href="{{ url()->full() }}" class="text-blue-600">Refresh</a>
                <a href="{{ url('/') }}" class="text-blue-600">Halaman Utama</a>
            </div>
            <div class="text-gray-500">
                <p>{{ $configs->address }}</p>
                <p>0{{ $configs->whatsapp_num }}</p>
                <p>{{ $configs->gmail }}</p>
            </div>
        </div>
    </div>
</body>
</html>
