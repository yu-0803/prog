const quiz =[
  {
    question:"マスオさんが会社で仲が良いのはだれ？",
  answers:[
  "うなぎさん",
  "どじょうさん",
  "あなごさん",
  "ぞうさん",
  ],
  correct:'あなごさん'
  },{
  question:"サザエさんの趣味はなに？",
  answers:[
  "読書",
  "料理",
  "お昼寝",
  "カツオをしばく",
  ],
  correct:'読書'
  },{
    question:"サザエさんとマスオさんの出会いは？",
  answers:[
  "ナンパ",
  "同級生",
  "お見合い",
  "出会い系アプリ",
  ],
  correct:'お見合い'
  },{
    question:"サザエさんの年齢は何歳？",
  answers:[
  "２歳",
  "２４歳",
  "２６歳",
  "３２歳",
  ],
  correct:'２４歳'
  },{
    question:"サザエさんの結婚する前の仕事はなに？",
  answers:[
  "バスガイド",
  "幼稚園の先生",
  "出版社の記者",
  "キャバクラ嬢",
  ],
  correct:'出版社の記者'
  }
];
const quizLength = quiz.length;
let quizindex = 0;

let score = 0;



  const $button = document.getElementsByTagName("button");
  const buttonlength = $button.length;

  const setupQuiz =() =>{
  document.getElementById("js-question").textContent = quiz[quizindex].question ;
  let buttonindex = 0;
  while(buttonindex < buttonlength){
    $button[buttonindex].textContent = quiz[quizindex].answers[buttonindex];
    buttonindex++;
  }
}

setupQuiz();


const clickhandler = (e) => {
  if(quiz[quizindex].correct === e.target.textContent){
    window.alert("正解！！");
    score++;
        }else{
    window.alert("不正解");
        }
quizindex++;
if(quizindex < quizLength){
setupQuiz();
}else{
  window.alert("終了!あなたの聖回数は" + score + '/' + quizLength + 'です！')
}
};

  let handlerindex = 0;

  while(handlerindex < buttonlength){
    $button[handlerindex].addEventListener("click",(e) =>{
      clickhandler(e);
      });
    handlerindex++;
  }
