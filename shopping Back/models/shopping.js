
const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const shoppingSchema = new Schema({

    receipt_shopping:{type:String},seller_id:{type:String},provider_id:{type:String},price_shopping:{type:String},date_shopping:{type:String},

}, {
    collection: 'shopping'
});

module.exports = mongoose.model('shopping', shoppingSchema);

