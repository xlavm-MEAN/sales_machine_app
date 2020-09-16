
const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const employee_contractSchema = new Schema({

    number_contract:{type:String},employee_id:{type:String},clause_one:{type:String},clause_two:{type:String},clause_tree:{type:String},observations:{type:String},

}, {
    collection: 'employee_contract'
});

module.exports = mongoose.model('employee_contract', employee_contractSchema);

