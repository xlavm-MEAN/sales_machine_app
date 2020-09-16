
const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const invoiceSchema = new Schema({

    invoice_id:{type:String},seller_id:{type:String},receipt_sale:{type:String},value:{type:String},date:{type:String},

}, {
    collection: 'invoice'
});

module.exports = mongoose.model('invoice', invoiceSchema);

