const {Router} = require('express');
const router = Router();
const homeController = require('../controllers/homeController');
const authCheck = require('../middleware/authCheck');


router.get('/', authCheck, homeController.getAll);

router.post('/', homeController.addAll);


module.exports = router;