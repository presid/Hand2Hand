const {Router} = require('express')
const router = Router()
const mainModel = require('../models/main')


router.get('/', (req, res, next) => {
    res.render('signIn', {
        title: 'Sign in'
    })
})

module.exports = router