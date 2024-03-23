const express = require('express');
const bodyParser = require('body-parser');
const path = require('path');
const cors = require('cors');

const app = express();
const backendPort = 3000; // Port for your backend
const frontendPort = process.env.FRONTEND_PORT || 3001; // Dynamic port for your frontend, with a default

app.use(cors({
    origin: `http://localhost:${frontendPort}`, // Dynamic origin based on variable
    methods: ['GET', 'POST'],
    allowedHeaders: ['Content-Type', 'Authorization']
}));

// Middleware
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(path.join(__dirname, 'public')));

// Set EJS as the template engine
app.set('view engine', 'ejs');

// Routes
app.get('/', (req, res) => {
    res.render('index');
});

// Start the server
app.listen(backendPort, () => {
    console.log(`Server is running on http://localhost:${backendPort}`);
});
