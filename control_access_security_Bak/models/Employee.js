const mongoose = require('mongoose')
const Schema = mongoose.Schema //para crear un schema de mongoDB

// se crea el schema de nuestra entidad
const EmployeeSchema = new Schema({
    employee_id: {
        type: String
    },
    first_name: {
        type: String
    },
    last_name: {
        type: String
    },
    role: {
        type: String,
    },
    username: {
        type: String,
        required: true
    },
    password: {
        type: String,
        required: true
    },
}, {
    collection: 'employee'
});

module.exports = Employee = mongoose.model('employee', EmployeeSchema) //así se llamará nuestra collections en mongo