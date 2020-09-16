
const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const saleSchema = new Schema({

    receipt_sale:{type:String},seller_id:{type:String},invoice_id:{type:String},sale_date:{type:String},sale_value:{type:String},

}, {
    collection: 'sale'
});

module.exports = mongoose.model('sale', saleSchema);

