let categories = document.querySelectorAll('.dashboard__aside__list__line__a');

function createBlocks() {
    blocksData.forEach((block) => {
        let isOpen = false;
        let content = document.querySelector(`.${block.contentClass}`);
        let svg = document.querySelector(`.${block.svgClass}`);
        let buttons = document.querySelectorAll(`.${block.buttonClass}`);

        buttons.forEach((element) => {
            element.addEventListener('click', () => {
                isOpen = divDrawer(isOpen, content, svg);
            });
        });
    });
}
categories.forEach((element) => {
    element.addEventListener('click', () => {
        categories.forEach((element) => {
            element.classList.remove('dashboard__aside__list__line__a--current');
            element.classList.add('dashboard__aside__list__line__a');
        });
        element.classList.remove('dashboard__aside__list__line__a');
        element.classList.add('dashboard__aside__list__line__a--current');
    });
})

document.addEventListener('DOMContentLoaded', () => {
    initializeCategoryClickHandlers();
});

const json = {
    "help": {
        "products": [
            {
                "question": "Are the mosquito nets easy to maintain ?",
                "answer": "Yes, our mosquito nets are designed to be easy to maintain. We provide detailed instructions to ensure simple and effective care."
            },
            {
                "question": "Where are your mosquito nets manufactured ?",
                "answer": "Nestled in the heart of Dijon, the birthplace of elegance and tradition, our mosquito nets come to life. Each piece is meticulously crafted by hand by our dedicated artisans, inheritors of a craftsmanship passed down through generations. In the charming atmosphere of our workshop, located in the heart of this iconic city, each luxury mosquito net takes shape with artisanal precision, resulting in a unique piece infused with the refinement that defines our family brand."
            },
            {
                "question": "What is the durability of the mosquito nets ?",
                "answer": "Our mosquito nets are crafted from high-quality materials to ensure exceptional durability. They are designed to withstand various weather conditions while retaining their elegance."
            },
            {
                "question": "Where can I purchase your mosquito nets ?",
                "answer": "Currently, we, unfortunately, do not have physical retail locations. All transactions take place through our website."

            },
            {
                "question": "Do you offer customization options for the mosquito nets ?",
                "answer": "Yes, we offer customization options for our mosquito nets. To explore these options, please contact our customer service via the contact button."
            }
        ],
        "refund_and_exchange": [
            {
                "question": "What is your refund policy for mosquito nets ?",
                "answer": "We offer a satisfaction guarantee. If you are not entirely satisfied with your mosquito net, we provide a full refund under certain conditions."
            },
            {
                "question": "How can I proceed with an exchange if the mosquito net does not meet my expectations ?",
                "answer": "You can easily request an exchange by contacting our customer service. We will do our best to find a solution that meets your needs."
            },
            {
                "question": "Are there any fees associated with returns or exchanges ?",
                "answer": "Returns are free. For exchanges, fees may apply depending on the circumstances."
            },
            {
                "question": "How long does it take to process a refund ?",
                "answer": "Refunds are typically processed within a few days. You will receive a confirmation by phone once the process is complete."
            },
            {
                "question": "Can I cancel my order and get a refund ?",
                "answer": "Yes, you can cancel your order as long as it has not been delivered to your address to receive a full refund."
            }
        ],
        "order": [
            {
                "question": "How can I place an order ?",
                "answer": "You can easily place an order on our website by selecting the desired product, customizing if necessary, and following the payment steps."
            },
            {
                "question": "Can I modify my order after it has been placed ?",
                "answer": "Once the order is confirmed, modifications are limited. However, quickly contact our customer service, and we will do our best to assist you."
            },
            {
                "question": "How can I track my order ?",
                "answer": "You will receive email updates throughout the shipping process. Additionally, you can track your order's status by logging into your account."
            },
            {
                "question": "What payment methods do you accept ?",
                "answer": "We only accept payments in pure gold or diamonds. For more information, please contact our customer service."
            },
            {
                "question": "Do you offer gift wrapping for orders ?",
                "answer": "Unfortunately not at the moment, but we are working on developing this."
            }
        ],
        "delivery": [
            {
                "question": "What are the delivery times for mosquito nets ?",
                "answer": "Delivery times vary depending on your location and order. You can check our order tracking page for specific information."
            },
            {
                "question": "Do you offer international delivery for mosquito nets ?",
                "answer": "Yes, we offer international delivery. However, delivery fees and times vary depending on the destination country."
            },
            {
                "question": "How can I change the delivery address after placing my order ?",
                "answer": "Quickly contact our customer service for any delivery address modifications. We will do our best to accommodate your request."
            },
            {
                "question": "What should I do in case of a delivery issue with my mosquito net ?",
                "answer": "In case of a delivery problem, please contact our customer service. We will take the necessary steps to resolve the situation."
            },
            {
                "question": "Can I schedule a delivery on a specific date for my luxury mosquito net ?",
                "answer": "Certainly, for that, you need to wait for the beginning of the delivery process, then you can contact our courier using a number provided by email, subject to a request to customer service."
            }
        ],
        "account": [
            {
                "question": "How can I create an account on your site to order a luxury mosquito net ?",
                "answer": "You can create an account by clicking on the character icon at the top right of the page. Follow the instructions to create your account."
            },
            {
                "question": "How can I reset my account password ?",
                "answer": "Click on the password reset link."
            },
            {
                "question": "Can I have multiple delivery addresses associated with my account ?",
                "answer": "Unfortunately not, you can modify the delivery address multiple times in your account, but only one will be saved each time to avoid the storage of your private data."
            },
            {
                "question": "How can I delete my account on your site ?",
                "answer": "For security reasons, please contact our customer service for any account deletion requests."
            },
            {
                "question": "Are there any benefits to creating an account on your site to order a luxury mosquito net ?",
                "answer": "Yes, creating an account offers benefits such as order tracking, secure payment options, and exclusive services reserved for members."
            }
        ]
    }
};


const blocksData = [
    { number: 1, contentClass: 'helpDash--question1--content', svgClass: 'helpDash--question1--svg', buttonClass: 'helpDash--question1--button' },
    { number: 2, contentClass: 'helpDash--question2--content', svgClass: 'helpDash--question2--svg', buttonClass: 'helpDash--question2--button' },
    { number: 3, contentClass: 'helpDash--question3--content', svgClass: 'helpDash--question3--svg', buttonClass: 'helpDash--question3--button' },
    { number: 4, contentClass: 'helpDash--question4--content', svgClass: 'helpDash--question4--svg', buttonClass: 'helpDash--question4--button' },
    { number: 5, contentClass: 'helpDash--question5--content', svgClass: 'helpDash--question5--svg', buttonClass: 'helpDash--question5--button' },
];


function initializeCategoryClickHandlers() {
    const categories = document.querySelectorAll('.dashboard__aside__list__line__a');
    const questionsContainer = document.querySelector('.dashboard__main__ul');
    const title = document.querySelector('.helpDash__title');

    categories.forEach((category, index) => {
        category.addEventListener('click', () => {
            const categoryKey = getCategoryKey(index);
            const questions = json.help[categoryKey];

            updateQuestionsContainer(questionsContainer, questions);
            createBlocks();
            updateTitle(title, categoryKey);
        });
    });
}



function getCategoryKey(index) {
    switch (index) {
        case 0:
            return 'products';
        case 1:
            return 'account';
        case 2:
            return 'delivery';
        case 3:
            return 'order';
        case 4:
            return 'refund_and_exchange';
        default:
            return '';
    }
}

function updateQuestionsContainer(container, questions) {
    container.innerHTML = '<li class="line--horizontal"></li>';

    questions.forEach((question, index) => {
        const blockNumber = index + 1;
        const blockTemplate = `
      <li class="divDrawer">
        <section class="helpDash--question${blockNumber}--button divDrawer__section">
          <h2>${question.question}</h2>
          <svg class="svg--2 helpDash--question${blockNumber}--svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M19.9181 8.9502L13.3981 15.4702C12.6281 16.2402 11.3681 16.2402 10.5981 15.4702L4.07812 8.9502" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </section>
        <div class="helpDash--question${blockNumber}--content divDrawer__content">
          <h3>${question.answer}</h3>
        </div>
      </li>
    `;

        container.innerHTML += blockTemplate;
    });
}

function updateTitle(title, categoryKey) {
    title.textContent = getCategoryTitle(categoryKey);
}

function getCategoryTitle(categoryKey) {
    switch (categoryKey) {
        case 'products':
            return 'Products';
        case 'account':
            return 'Account';
        case 'delivery':
            return 'Delivery';
        case 'order':
            return 'Order';
        case 'refund_and_exchange':
            return 'Refund and Exchange';
        default:
            return '';
    }
}

function divDrawer(drawerOpen, drawer, drawerSVG){
    if (!drawerOpen){
        drawer.style.display = 'flex';
        drawer.style.opacity = '1';
        drawerSVG.innerHTML = svgUp
        return true;
    }
    else {
        drawer.style.display = 'none';
        drawer.style.opacity = '0';
        drawerSVG.innerHTML = svgDown;
        return false;
    }
}

const svgUp = '<path d="M4.08187 15.0498L10.6019 8.5298C11.3719 7.7598 12.6319 7.7598 13.4019 8.5298L19.9219 15.0498" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>'

const svgDown = '<path d="M19.9181 8.9502L13.3981 15.4702C12.6281 16.2402 11.3681 16.2402 10.5981 15.4702L4.07812 8.9502" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>'

createBlocks();