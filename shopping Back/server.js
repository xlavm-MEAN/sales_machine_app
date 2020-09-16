
var express = require('express');
var cors = require('cors');
var path = require('path');
var bodyParser = require('body-parser');
const mongoose = require('mongoose');
var app = express();

var port = process.env.PORT || 3003;
const mongoURI = 'mongodb://localhost:27017/sales_machine_db';

mongoose.connect(mongoURI,{ useNewUrlParser: true })
.then(() => console.log('MongoDB Connected'))
.catch(err => console.log(err));

app.use(bodyParser.json());
app.use(cors());

//modelos:
var checklist_stateRouter= require('./routes/checklist_stateRouter'); 
app.use('/checklist_state', checklist_stateRouter);
var inventaryRouter= require('./routes/inventaryRouter'); 
app.use('/inventary', inventaryRouter);
var machineRouter= require('./routes/machineRouter'); 
app.use('/machine', machineRouter);
var providerRouter= require('./routes/providerRouter'); 
app.use('/provider', providerRouter);
var shoppingRouter= require('./routes/shoppingRouter'); 
app.use('/shopping', shoppingRouter);


app.listen(port, function() {
    console.log('Server is running on port: ' + port);
})

