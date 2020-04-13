const Sequelize = require('sequelize');
const db = require('../utils/database');
const Product = require('../models/Product');

const Category = db.define('Category', {
    id: {
        type: Sequelize.INTEGER.UNSIGNED.ZEROFILL,
        primaryKey: true,
        autoIncrement: true,
        allowNull: false
    },

    name: {
        type: Sequelize.STRING(15),
        allowNull: false
    }
});

// db.sync({force:true}).then(()=>{
 
//     console.log("Tables have been created");
//   }).catch(err=>console.log(err));

// Category.hasMany(Product);
// Product.belongsTo(Category);

module.exports = Category;