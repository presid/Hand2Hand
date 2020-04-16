const {Router} = require('express');
const router = Router();
const Controller = require('../controllers/homeController');


router.get('/', Controller.getAll);

router.post('/', Controller.addAll);


module.exports = router;