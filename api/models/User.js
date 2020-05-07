const Sequelize = require('sequelize');
const db = require('../../utils/database');
const Product = require('../models/Product');

const User = db.define('User', {
    id: {
        type: Sequelize.INTEGER.UNSIGNED.ZEROFILL,
        primaryKey: true,
        autoIncrement: true,
        allowNull: false
    },

    user_name: {
        type: Sequelize.STRING(30),
        allowNull: false
    },

    user_lastname: {
        type: Sequelize.STRING(30),
        allowNull: false
    },

    email: {
        type: Sequelize.STRING(30),
        allowNull: false
    },

    password: {
        type: Sequelize.STRING(255),
        allowNull: false
    },

    state: {
        type: Sequelize.STRING(15),
        allowNull: false
    },

    city: {
        type: Sequelize.STRING(15),
        allowNull: false
    },

    phone: {
        type: Sequelize.STRING(12),
        allowNull: false
    },

    reg_date: {
        type: Sequelize.DATEONLY,
        defaultValue: Sequelize.NOW
    },

    image: {
        type: Sequelize.STRING
    }

});


// db.sync({force:true}).then(()=>{
 
//     console.log("Tables have been created");
//   }).catch(err=>console.log(err));

User.hasMany(Product);
Product.belongsTo(User);

// db.sync({force: true});


module.exports = User;