document.getElementById('fileInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        // Comprimir imagem
        new Compressor(file, {
            quality: 0.6, // Define a qualidade da imagem comprimida (0.0 a 1.0)
            maxWidth: 500, // Define a largura máxima da imagem redimensionada
            maxHeight: 500, // Define a altura máxima da imagem redimensionada
            success(result) {
                const preview = document.getElementById('preview');
                preview.src = URL.createObjectURL(result);
                preview.style.display = 'block';
            },
            error(err) {
                console.error('Erro ao comprimir a imagem:', err);
            },
        });
    }
});