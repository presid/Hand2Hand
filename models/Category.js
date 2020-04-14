const Sequelize = require('sequelize');
const db = require('../utils/database');
const Product = require('../models/Product');
const Subcategory = require('../models/Subcategory');
// const User = require('../models/User');

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

Category.hasMany(Product);
Product.belongsTo(Category);


Category.hasMany(Subcategory);
Subcategory.belongsTo(Category);
// db.sync();

module.exports = Category;