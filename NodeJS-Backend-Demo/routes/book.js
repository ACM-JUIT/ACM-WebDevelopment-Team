const express = require('express');
const router = express.Router();

const {getAllBooks, addBook, getBookById, getBook, deleteBookById} = require('../controllers/book');

// Middleware
router.param('bookId', getBookById);

// Routes
router.get('/book/all', getAllBooks);
router.get('/book/:bookId', getBook);
router.post('/book/add', addBook);
router.delete('/book/:bookId', deleteBookById);

module.exports = router;