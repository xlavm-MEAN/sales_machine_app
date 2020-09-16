
const express = require('express');
const app = express();
const employee_contractRouter = express.Router();

let employee_contract = require('../models/employee_contract');

employee_contractRouter.route('/add').post((req, res) => {
    let employee_contractInstance = new employee_contract(req.body);
    employee_contractInstance.save().then(employee_contractInstance => {
            res.status(200).json({ 'employee_contractInstance': 'employee_contractInstance is added successfully' });
        })
        .catch(err => {
            res.status(400).send('Unable to add  employee_contractInstance to database');
        });
});

employee_contractRouter.route('/').get((req, res) => {
    employee_contract.find(function(err, employee_contractInstance) {
        if (employee_contractInstance) {
            res.json(employee_contractInstance);
        } else {
            console.log(err);
        }
    });
});

employee_contractRouter.route('/edit/:id').get((req, res) => {
    let id = req.params.id;
    employee_contract.findById(id, (err, employee_contractInstance) => {
        res.json(employee_contractInstance);
    });
});

employee_contractRouter.route('/update/:id').post((req, res) => {
    employee_contract.findById(req.params.id, (err, employee_contractInstance) => {
        if (!employee_contractInstance) {
            return next(new Error('Could not load the document'));
        } else {


            employee_contractInstance .number_contract=req.body.number_contract;employee_contractInstance .employee_id=req.body.employee_id;employee_contractInstance .clause_one=req.body.clause_one;employee_contractInstance .clause_two=req.body.clause_two;employee_contractInstance .clause_tree=req.body.clause_tree;employee_contractInstance .observations=req.body.observations;



            employee_contractInstance.save().then(employee_contractInstance => {
                    res.json('Data Updated Successfully');
                })
                .catch(err => {
                    res.status(400).send('Unable to update the database');
                });
        }
    });
});

employee_contractRouter.route('/delete/:id').get((req, res) => {
    let id = req.params.id;
    employee_contract.findByIdAndDelete(id, (err, employee_contractInstance) => {
        if (err) {
            res.json(err)
        } else {
            res.json('Data Removed Successfully');
        }
    });
});

module.exports = employee_contractRouter;

