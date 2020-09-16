
const express = require('express');
const app = express();
const providerRouter = express.Router();

let provider = require('../models/provider');

providerRouter.route('/add').post((req, res) => {
    let providerInstance = new provider(req.body);
    providerInstance.save().then(providerInstance => {
            res.status(200).json({ 'providerInstance': 'providerInstance is added successfully' });
        })
        .catch(err => {
            res.status(400).send('Unable to add  providerInstance to database');
        });
});

providerRouter.route('/').get((req, res) => {
    provider.find(function(err, providerInstance) {
        if (providerInstance) {
            res.json(providerInstance);
        } else {
            console.log(err);
        }
    });
});

providerRouter.route('/edit/:id').get((req, res) => {
    let id = req.params.id;
    provider.findById(id, (err, providerInstance) => {
        res.json(providerInstance);
    });
});

providerRouter.route('/update/:id').post((req, res) => {
    provider.findById(req.params.id, (err, providerInstance) => {
        if (!providerInstance) {
            return next(new Error('Could not load the document'));
        } else {


            providerInstance .provider_id=req.body.provider_id;providerInstance .social_reason=req.body.social_reason;providerInstance .adress=req.body.adress;providerInstance .telephone=req.body.telephone;



            providerInstance.save().then(providerInstance => {
                    res.json('Data Updated Successfully');
                })
                .catch(err => {
                    res.status(400).send('Unable to update the database');
                });
        }
    });
});

providerRouter.route('/delete/:id').get((req, res) => {
    let id = req.params.id;
    provider.findByIdAndDelete(id, (err, providerInstance) => {
        if (err) {
            res.json(err)
        } else {
            res.json('Data Removed Successfully');
        }
    });
});

module.exports = providerRouter;

