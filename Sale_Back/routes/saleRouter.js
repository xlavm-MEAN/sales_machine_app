
const express = require('express');
const app = express();
const saleRouter = express.Router();

let sale = require('../models/sale');

saleRouter.route('/add').post((req, res) => {
    let saleInstance = new sale(req.body);
    saleInstance.save().then(saleInstance => {
            res.status(200).json({ 'saleInstance': 'saleInstance is added successfully' });
        })
        .catch(err => {
            res.status(400).send('Unable to add  saleInstance to database');
        });
});

saleRouter.route('/').get((req, res) => {
    sale.find(function(err, saleInstance) {
        if (saleInstance) {
            res.json(saleInstance);
        } else {
            console.log(err);
        }
    });
});

saleRouter.route('/edit/:id').get((req, res) => {
    let id = req.params.id;
    sale.findById(id, (err, saleInstance) => {
        res.json(saleInstance);
    });
});

saleRouter.route('/update/:id').post((req, res) => {
    sale.findById(req.params.id, (err, saleInstance) => {
        if (!saleInstance) {
            return next(new Error('Could not load the document'));
        } else {


            saleInstance .receipt_sale=req.body.receipt_sale;saleInstance .seller_id=req.body.seller_id;saleInstance .invoice_id=req.body.invoice_id;saleInstance .sale_date=req.body.sale_date;saleInstance .sale_value=req.body.sale_value;



            saleInstance.save().then(saleInstance => {
                    res.json('Data Updated Successfully');
                })
                .catch(err => {
                    res.status(400).send('Unable to update the database');
                });
        }
    });
});

saleRouter.route('/delete/:id').get((req, res) => {
    let id = req.params.id;
    sale.findByIdAndDelete(id, (err, saleInstance) => {
        if (err) {
            res.json(err)
        } else {
            res.json('Data Removed Successfully');
        }
    });
});

module.exports = saleRouter;

