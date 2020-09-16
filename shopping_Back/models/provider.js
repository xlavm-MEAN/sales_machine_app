
const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const providerSchema = new Schema({

    provider_id:{type:String},social_reason:{type:String},adress:{type:String},telephone:{type:String},

}, {
    collection: 'provider'
});

module.exports = mongoose.model('provider', providerSchema);

