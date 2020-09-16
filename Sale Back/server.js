
var express = require('express');
var cors = require('cors');
var path = require('path');
var bodyParser = require('body-parser');
const mongoose = require('mongoose');
var app = express();

var port = process.env.PORT || 3002;
const mongoURI = 'mongodb://localhost:27017/sales_machine_db';

mongoose.connect(mongoURI,{ useNewUrlParser: true })
.then(() => console.log('MongoDB Connected'))
.catch(err => console.log(err));

app.use(bodyParser.json());
app.use(cors());

//modelos:
var invoiceRouter= require('./routes/invoiceRouter'); 
app.use('/invoice', invoiceRouter);
var saleRouter= require('./routes/saleRouter'); 
app.use('/sale', saleRouter);
var sale_cartRouter= require('./routes/sale_cartRouter'); 
app.use('/sale_cart', sale_cartRouter);


app.listen(port, function() {
    console.log('Server is running on port: ' + port);
})

