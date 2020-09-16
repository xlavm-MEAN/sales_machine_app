
const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const inventarySchema = new Schema({

    inventary_id:{type:String},machine_serial:{type:String},total_value:{type:String},inventary_date:{type:String},

}, {
    collection: 'inventary'
});

module.exports = mongoose.model('inventary', inventarySchema);

