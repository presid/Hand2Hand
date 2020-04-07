const {Router} = require('express')
const router = Router()
const db = require('../utils/database')
const product = require('../models/products')

router.get('/', async (req, res, next) => {
    try {
        const prod = await product.findAll({raw: true})
        res.render('index', {
            prod
        })
    } catch (e) {
        console.log(e)
    }
    
})



module.exports = router