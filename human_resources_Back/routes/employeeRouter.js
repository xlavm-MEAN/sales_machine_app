
const express = require('express');
const app = express();
const employeeRouter = express.Router();

let employee = require('../models/employee');

employeeRouter.route('/add').post((req, res) => {
    let employeeInstance = new employee(req.body);
    employeeInstance.save().then(employeeInstance => {
            res.status(200).json({ 'employeeInstance': 'employeeInstance is added successfully' });
        })
        .catch(err => {
            res.status(400).send('Unable to add  employeeInstance to database');
        });
});

employeeRouter.route('/').get((req, res) => {
    employee.find(function(err, employeeInstance) {
        if (employeeInstance) {
            res.json(employeeInstance);
        } else {
            console.log(err);
        }
    });
});

employeeRouter.route('/edit/:id').get((req, res) => {
    let id = req.params.id;
    employee.findById(id, (err, employeeInstance) => {
        res.json(employeeInstance);
    });
});

employeeRouter.route('/update/:id').post((req, res) => {
    employee.findById(req.params.id, (err, employeeInstance) => {
        if (!employeeInstance) {
            return next(new Error('Could not load the document'));
        } else {


            employeeInstance .employee_id=req.body.employee_id;employeeInstance .first_name=req.body.first_name;employeeInstance .last_name=req.body.last_name;employeeInstance .role=req.body.role;employeeInstance .username=req.body.username;employeeInstance .password=req.body.password;



            employeeInstance.save().then(employeeInstance => {
                    res.json('Data Updated Successfully');
                })
                .catch(err => {
                    res.status(400).send('Unable to update the database');
                });
        }
    });
});

employeeRouter.route('/delete/:id').get((req, res) => {
    let id = req.params.id;
    employee.findByIdAndDelete(id, (err, employeeInstance) => {
        if (err) {
            res.json(err)
        } else {
            res.json('Data Removed Successfully');
        }
    });
});

module.exports = employeeRouter;

