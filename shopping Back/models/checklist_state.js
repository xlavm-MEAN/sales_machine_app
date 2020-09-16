
const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const checklist_stateSchema = new Schema({

    checklist_id:{type:String},serial_machine:{type:String},receipt_shopping:{type:String},checklist_date:{type:String},point1:{type:String},point2:{type:String},point3:{type:String},point4:{type:String},point5:{type:String},

}, {
    collection: 'checklist_state'
});

module.exports = mongoose.model('checklist_state', checklist_stateSchema);

