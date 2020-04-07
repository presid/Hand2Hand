const Sequelize = require('sequelize')

const DB_NAME = 'realdeal_dev'
const USER_NAME = 'nodejs'
const PASSWORD = 'admin'

const sequelize = new Sequelize(DB_NAME, USER_NAME, PASSWORD, {
    host: 'localhost',
    dialect: 'mysql'
})

module.exports = sequelize