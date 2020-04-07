const {Router} = require('express')
const router = Router()
const mainModel = require('../models/products')


router.get('/', (req, res, next) => {
    res.render('signIn', {
        title: 'Sign in'
    })
})

module.exports = router