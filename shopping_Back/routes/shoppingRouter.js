
const express = require('express');
const app = express();
const shoppingRouter = express.Router();

let shopping = require('../models/shopping');

shoppingRouter.route('/add').post((req, res) => {
    let shoppingInstance = new shopping(req.body);
    shoppingInstance.save().then(shoppingInstance => {
            res.status(200).json({ 'shoppingInstance': 'shoppingInstance is added successfully' });
        })
        .catch(err => {
            res.status(400).send('Unable to add  shoppingInstance to database');
        });
});

shoppingRouter.route('/').get((req, res) => {
    shopping.find(function(err, shoppingInstance) {
        if (shoppingInstance) {
            res.json(shoppingInstance);
        } else {
            console.log(err);
        }
    });
});

shoppingRouter.route('/edit/:id').get((req, res) => {
    let id = req.params.id;
    shopping.findById(id, (err, shoppingInstance) => {
        res.json(shoppingInstance);
    });
});

shoppingRouter.route('/update/:id').post((req, res) => {
    shopping.findById(req.params.id, (err, shoppingInstance) => {
        if (!shoppingInstance) {
            return next(new Error('Could not load the document'));
        } else {


            shoppingInstance .receipt_shopping=req.body.receipt_shopping;shoppingInstance .seller_id=req.body.seller_id;shoppingInstance .provider_id=req.body.provider_id;shoppingInstance .price_shopping=req.body.price_shopping;shoppingInstance .date_shopping=req.body.date_shopping;



            shoppingInstance.save().then(shoppingInstance => {
                    res.json('Data Updated Successfully');
                })
                .catch(err => {
                    res.status(400).send('Unable to update the database');
                });
        }
    });
});

shoppingRouter.route('/delete/:id').get((req, res) => {
    let id = req.params.id;
    shopping.findByIdAndDelete(id, (err, shoppingInstance) => {
        if (err) {
            res.json(err)
        } else {
            res.json('Data Removed Successfully');
        }
    });
});

module.exports = shoppingRouter;

