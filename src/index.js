const express = require('express'); // Import Express
const axios = require('axios');     // Import Axios untuk HTTP request

const app = express();              // Buat instance aplikasi Express
const PORT = 3000;                  // Port server

// Route untuk memanggil API eksternal
app.get('/api/index', async (req, res) => {
    try {
        // Panggil API eksternal
        const response = await axios.get('https://api-tesingcat.vercel.app/api/categories');
        
        // Kirim data yang diterima dari API eksternal sebagai response
        res.status(200).json(response.data);
    } catch (error) {
        // Tangani error jika API eksternal gagal dipanggil
        res.status(500).json({
            error: 'Failed to fetch data from external API',
            details: error.message
        });
    }
});

// Start server Express
app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
