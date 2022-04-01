 //获取当前时间
 export default function getNowDay(val:any) {
    const date = new Date(val);
    const year = date.getFullYear();
    const month = date.getMonth() + 1;
    const day = date.getDate();
    return `${year}-${month}-${day}`;
  }


