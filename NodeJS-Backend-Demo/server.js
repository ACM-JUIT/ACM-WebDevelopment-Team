require('dotenv').config();

const express = require('express');
const mongoose = require('mongoose');
const app = express();
const port = process.env.PORT || 1000;
const bookRoutes = require('./routes/book');


// Database Connection
mongoose.connect(process.env.DATABASE, {
    useNewUrlParser: true,
    useCreateIndex: true,
    useUnifiedTopology: true
}).then(() => {
    console.log('DB Connected');
}) 

// Middlewares
app.use(express.json())

// Routes
app.use('/api', bookRoutes);

app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
})