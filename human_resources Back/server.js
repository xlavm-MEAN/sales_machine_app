
var express = require('express');
var cors = require('cors');
var path = require('path');
var bodyParser = require('body-parser');
const mongoose = require('mongoose');
var app = express();

var port = process.env.PORT || 3001;
const mongoURI = 'mongodb://localhost:27017/sales_machine_db';

mongoose.connect(mongoURI,{ useNewUrlParser: true })
.then(() => console.log('MongoDB Connected'))
.catch(err => console.log(err));

app.use(bodyParser.json());
app.use(cors());

//modelos:
var employeeRouter= require('./routes/employeeRouter'); 
app.use('/employee', employeeRouter);
var employee_contractRouter= require('./routes/employee_contractRouter'); 
app.use('/employee_contract', employee_contractRouter);
var employee_evaluationRouter= require('./routes/employee_evaluationRouter'); 
app.use('/employee_evaluation', employee_evaluationRouter);


app.listen(port, function() {
    console.log('Server is running on port: ' + port);
})

