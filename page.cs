using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Pagess
{
    #region Page
    public class Page
    {
        #region Member Variables
        protected string _name;
        protected string _lastname;
        protected string _email;
        protected string _passcode;
        protected int _avtar;
        protected int _state;
        protected DateTime _times;
        #endregion
        #region Constructors
        public Page() { }
        public Page(string name, string lastname, string email, string passcode, int avtar, int state, DateTime times)
        {
            this._name=name;
            this._lastname=lastname;
            this._email=email;
            this._passcode=passcode;
            this._avtar=avtar;
            this._state=state;
            this._times=times;
        }
        #endregion
        #region Public Properties
        public virtual string Name
        {
            get {return _name;}
            set {_name=value;}
        }
        public virtual string Lastname
        {
            get {return _lastname;}
            set {_lastname=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual string Passcode
        {
            get {return _passcode;}
            set {_passcode=value;}
        }
        public virtual int Avtar
        {
            get {return _avtar;}
            set {_avtar=value;}
        }
        public virtual int State
        {
            get {return _state;}
            set {_state=value;}
        }
        public virtual DateTime Times
        {
            get {return _times;}
            set {_times=value;}
        }
        #endregion
    }
    #endregion
}