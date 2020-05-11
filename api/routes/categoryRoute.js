const {Router} = require('express');
const router = Router();
const categoryController = require('../controllers/categoryController');
const authCheck = require('../middleware/authCheck');

router.get('/:categoryName', authCheck, categoryController.getCategory);

module.exports = router;