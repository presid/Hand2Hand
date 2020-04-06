const {Router} = require('express')
const router = Router()
const mainModel = require('../models/main')

router.get('/', (req, res, next) => {
    
    res.render('index', {
        title: 'Main page'
    })
    
})



module.exports = router