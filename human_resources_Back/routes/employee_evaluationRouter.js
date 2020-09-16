
const express = require('express');
const app = express();
const employee_evaluationRouter = express.Router();

let employee_evaluation = require('../models/employee_evaluation');

employee_evaluationRouter.route('/add').post((req, res) => {
    let employee_evaluationInstance = new employee_evaluation(req.body);
    employee_evaluationInstance.save().then(employee_evaluationInstance => {
            res.status(200).json({ 'employee_evaluationInstance': 'employee_evaluationInstance is added successfully' });
        })
        .catch(err => {
            res.status(400).send('Unable to add  employee_evaluationInstance to database');
        });
});

employee_evaluationRouter.route('/').get((req, res) => {
    employee_evaluation.find(function(err, employee_evaluationInstance) {
        if (employee_evaluationInstance) {
            res.json(employee_evaluationInstance);
        } else {
            console.log(err);
        }
    });
});

employee_evaluationRouter.route('/edit/:id').get((req, res) => {
    let id = req.params.id;
    employee_evaluation.findById(id, (err, employee_evaluationInstance) => {
        res.json(employee_evaluationInstance);
    });
});

employee_evaluationRouter.route('/update/:id').post((req, res) => {
    employee_evaluation.findById(req.params.id, (err, employee_evaluationInstance) => {
        if (!employee_evaluationInstance) {
            return next(new Error('Could not load the document'));
        } else {


            employee_evaluationInstance .evaluation_number=req.body.evaluation_number;employee_evaluationInstance .employee_id=req.body.employee_id;employee_evaluationInstance .result_evaluation=req.body.result_evaluation;employee_evaluationInstance .point1=req.body.point1;employee_evaluationInstance .point2=req.body.point2;employee_evaluationInstance .point3=req.body.point3;employee_evaluationInstance .point4=req.body.point4;employee_evaluationInstance .point5=req.body.point5;



            employee_evaluationInstance.save().then(employee_evaluationInstance => {
                    res.json('Data Updated Successfully');
                })
                .catch(err => {
                    res.status(400).send('Unable to update the database');
                });
        }
    });
});

employee_evaluationRouter.route('/delete/:id').get((req, res) => {
    let id = req.params.id;
    employee_evaluation.findByIdAndDelete(id, (err, employee_evaluationInstance) => {
        if (err) {
            res.json(err)
        } else {
            res.json('Data Removed Successfully');
        }
    });
});

module.exports = employee_evaluationRouter;

