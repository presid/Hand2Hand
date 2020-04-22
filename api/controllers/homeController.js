const User = require('../models/User');
const Product = require('../models/Product');
const Category = require('../models/Category');
const Options = require('../models/Options');

exports.getAll = async (req, res) => {
    
    try {
        const products = await Product.findAll({raw: true});

        const categories = await Category.findAll({raw: true});

        const user = await User.findOne({raw: true});
            
        res.render('index', {
            title: 'main page',
            product: products,
            category: categories,
            user: user        
        });

        console.log(categories);
    } catch (e) {
        console.log(e);
    }

    // try {
    //     await Product.findAll({raw: true})
    //         .then((products) => {
    //             Category.findAll({plain: true, raw: true})
    //             .then((categories ) => {
    //                 User.findOne({plain: true, raw: true})
    //                 .then((user) => {
    //                     console.log(user, categories, products);
    //                     res.render('index', {
    //                         title: 'main page',
    //                         product: products,
    //                         category: categories,
    //                         user: user        
    //                     });
    //                 });
    //             });
    //         });

    //     console.log(categories);
    // } catch (e) {
    //     console.log(e);
    // }
    
}


exports.addAll = async (req, res) => {
    try {
        let user2 = await User.create({
            user_name: 'Tony',
            user_lastname: 'Stark',
            email: 'ironstark@mail.com',
            state: 'Marvel',
            city: 'DC', 
            phone: '111111',
            reg_date: '2020-04-14 00:00:00.000',
            image: '/images/users_prof_pic/tonystark.jpg'
        });

        let category2 = await Category.create({
            name: 'Vehicles',
            parent_id: 0
        });

        let options = await Options.create({
            name: 'mileage'
        });

        let product1 = await Product.create({
            product_name: 'BMW x6',
            price: 130000,
            description: 'Solid car without a car accident',
            image: '/images/vehicles/bmwx6.jpg',
            date: '2020-04-14 00:00:00.000',
            UserId: 2,
            CategoryId: 2
        });     
       

        res.sendStatus(200);

    } catch (err) {
        console.log(err);
    };
}
