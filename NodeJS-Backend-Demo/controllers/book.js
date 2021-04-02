const e = require('express');
const Book = require('../models/book');

exports.getBookById = (req, res, next, id) => {
    Book.findById(id).exec((err, book) => {
        if(err || !book) {
            return res.status(400).json({
                error: 'Book not Found!'
            })
        }
        req.book = book;
        next();
    })
}

exports.getBook = (req, res) => {
    return res.json(req.book);
}

exports.addBook = (req, res) => {
    const book = new Book(req.body);
    book.save((err, book) => {
        if(err) {
            return res.status(400).json({
                error: 'Could not save the book'
            })
        }
        res.json(book);
    })
}

exports.getAllBooks = (req, res) => {
    Book.find().exec((err, books) => {
        if(err) {
            return res.status(400).json({
                error: 'No Books found in DB'
            })
        }
        res.json(books);
    })
}

exports.deleteBookById = (req, res) => {
    const book = req.book;
    book.remove((err, book) => {
        if(err) {
            return res.status(400).json({
                error: 'Could not Delete, try again'
            })
        }
        res.json({
            message: `Deleted: ${book.title}`
        })
    })
}