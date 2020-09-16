
const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const employee_evaluationSchema = new Schema({

    evaluation_number:{type:String},employee_id:{type:String},result_evaluation:{type:String},point1:{type:String},point2:{type:String},point3:{type:String},point4:{type:String},point5:{type:String},

}, {
    collection: 'employee_evaluation'
});

module.exports = mongoose.model('employee_evaluation', employee_evaluationSchema);

