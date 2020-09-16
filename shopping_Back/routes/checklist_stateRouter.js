
const express = require('express');
const app = express();
const checklist_stateRouter = express.Router();

let checklist_state = require('../models/checklist_state');

checklist_stateRouter.route('/add').post((req, res) => {
    let checklist_stateInstance = new checklist_state(req.body);
    checklist_stateInstance.save().then(checklist_stateInstance => {
            res.status(200).json({ 'checklist_stateInstance': 'checklist_stateInstance is added successfully' });
        })
        .catch(err => {
            res.status(400).send('Unable to add  checklist_stateInstance to database');
        });
});

checklist_stateRouter.route('/').get((req, res) => {
    checklist_state.find(function(err, checklist_stateInstance) {
        if (checklist_stateInstance) {
            res.json(checklist_stateInstance);
        } else {
            console.log(err);
        }
    });
});

checklist_stateRouter.route('/edit/:id').get((req, res) => {
    let id = req.params.id;
    checklist_state.findById(id, (err, checklist_stateInstance) => {
        res.json(checklist_stateInstance);
    });
});

checklist_stateRouter.route('/update/:id').post((req, res) => {
    checklist_state.findById(req.params.id, (err, checklist_stateInstance) => {
        if (!checklist_stateInstance) {
            return next(new Error('Could not load the document'));
        } else {


            checklist_stateInstance .checklist_id=req.body.checklist_id;checklist_stateInstance .serial_machine=req.body.serial_machine;checklist_stateInstance .receipt_shopping=req.body.receipt_shopping;checklist_stateInstance .checklist_date=req.body.checklist_date;checklist_stateInstance .point1=req.body.point1;checklist_stateInstance .point2=req.body.point2;checklist_stateInstance .point3=req.body.point3;checklist_stateInstance .point4=req.body.point4;checklist_stateInstance .point5=req.body.point5;



            checklist_stateInstance.save().then(checklist_stateInstance => {
                    res.json('Data Updated Successfully');
                })
                .catch(err => {
                    res.status(400).send('Unable to update the database');
                });
        }
    });
});

checklist_stateRouter.route('/delete/:id').get((req, res) => {
    let id = req.params.id;
    checklist_state.findByIdAndDelete(id, (err, checklist_stateInstance) => {
        if (err) {
            res.json(err)
        } else {
            res.json('Data Removed Successfully');
        }
    });
});

module.exports = checklist_stateRouter;

