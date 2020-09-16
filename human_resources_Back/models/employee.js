
const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const employeeSchema = new Schema({

    employee_id:{type:String},first_name:{type:String},last_name:{type:String},role:{type:String},username:{type:String},password:{type:String},

}, {
    collection: 'employee'
});

module.exports = mongoose.model('employee', employeeSchema);

