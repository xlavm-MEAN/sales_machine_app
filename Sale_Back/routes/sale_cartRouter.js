
const express = require('express');
const app = express();
const sale_cartRouter = express.Router();

let sale_cart = require('../models/sale_cart');

sale_cartRouter.route('/add').post((req, res) => {
    let sale_cartInstance = new sale_cart(req.body);
    sale_cartInstance.save().then(sale_cartInstance => {
            res.status(200).json({ 'sale_cartInstance': 'sale_cartInstance is added successfully' });
        })
        .catch(err => {
            res.status(400).send('Unable to add  sale_cartInstance to database');
        });
});

sale_cartRouter.route('/').get((req, res) => {
    sale_cart.find(function(err, sale_cartInstance) {
        if (sale_cartInstance) {
            res.json(sale_cartInstance);
        } else {
            console.log(err);
        }
    });
});

sale_cartRouter.route('/edit/:id').get((req, res) => {
    let id = req.params.id;
    sale_cart.findById(id, (err, sale_cartInstance) => {
        res.json(sale_cartInstance);
    });
});

sale_cartRouter.route('/update/:id').post((req, res) => {
    sale_cart.findById(req.params.id, (err, sale_cartInstance) => {
        if (!sale_cartInstance) {
            return next(new Error('Could not load the document'));
        } else {


            sale_cartInstance .receipt_sale=req.body.receipt_sale;sale_cartInstance .seller_id=req.body.seller_id;sale_cartInstance .invoice_id=req.body.invoice_id;sale_cartInstance .sale_date=req.body.sale_date;sale_cartInstance .sale_value=req.body.sale_value;



            sale_cartInstance.save().then(sale_cartInstance => {
                    res.json('Data Updated Successfully');
                })
                .catch(err => {
                    res.status(400).send('Unable to update the database');
                });
        }
    });
});

sale_cartRouter.route('/delete/:id').get((req, res) => {
    let id = req.params.id;
    sale_cart.findByIdAndDelete(id, (err, sale_cartInstance) => {
        if (err) {
            res.json(err)
        } else {
            res.json('Data Removed Successfully');
        }
    });
});

module.exports = sale_cartRouter;

